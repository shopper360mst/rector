<?php

declare (strict_types=1);
namespace Rector\TypeDeclaration\Rector\Property;

use PhpParser\Node;
use PhpParser\Node\Stmt\Property;
use PHPStan\Analyser\Scope;
use PHPStan\Reflection\ClassReflection;
use PHPStan\Type\StringType;
use Rector\Contract\Rector\ConfigurableRectorInterface;
use Rector\Exception\ShouldNotHappenException;
use Rector\PHPStanStaticTypeMapper\Enum\TypeKind;
use Rector\Rector\AbstractScopeAwareRector;
use Rector\StaticTypeMapper\StaticTypeMapper;
use Rector\TypeDeclaration\ValueObject\AddPropertyTypeDeclaration;
use Symplify\RuleDocGenerator\ValueObject\CodeSample\ConfiguredCodeSample;
use Symplify\RuleDocGenerator\ValueObject\RuleDefinition;
use RectorPrefix202401\Webmozart\Assert\Assert;
/**
 * @see \Rector\Tests\TypeDeclaration\Rector\Property\AddPropertyTypeDeclarationRector\AddPropertyTypeDeclarationRectorTest
 */
final class AddPropertyTypeDeclarationRector extends AbstractScopeAwareRector implements ConfigurableRectorInterface
{
    /**
     * @readonly
     * @var \Rector\StaticTypeMapper\StaticTypeMapper
     */
    private $staticTypeMapper;
    /**
     * @var AddPropertyTypeDeclaration[]
     */
    private $addPropertyTypeDeclarations = [];
    public function __construct(StaticTypeMapper $staticTypeMapper)
    {
        $this->staticTypeMapper = $staticTypeMapper;
    }
    public function getRuleDefinition() : RuleDefinition
    {
        $configuration = [new AddPropertyTypeDeclaration('ParentClass', 'name', new StringType())];
        return new RuleDefinition('Add type to property by added rules, mostly public/property by parent type', [new ConfiguredCodeSample(<<<'CODE_SAMPLE'
class SomeClass extends ParentClass
{
    public $name;
}
CODE_SAMPLE
, <<<'CODE_SAMPLE'
class SomeClass extends ParentClass
{
    public string $name;
}
CODE_SAMPLE
, $configuration)]);
    }
    /**
     * @return array<class-string<Node>>
     */
    public function getNodeTypes() : array
    {
        return [Property::class];
    }
    /**
     * @param Property $node
     */
    public function refactorWithScope(Node $node, Scope $scope) : ?Node
    {
        // type is already known
        if ($node->type !== null) {
            return null;
        }
        $classReflection = $scope->getClassReflection();
        if (!$classReflection instanceof ClassReflection) {
            return null;
        }
        foreach ($this->addPropertyTypeDeclarations as $addPropertyTypeDeclaration) {
            if (!$this->isClassReflectionType($classReflection, $addPropertyTypeDeclaration->getClass())) {
                continue;
            }
            if (!$this->isName($node, $addPropertyTypeDeclaration->getPropertyName())) {
                continue;
            }
            $typeNode = $this->staticTypeMapper->mapPHPStanTypeToPhpParserNode($addPropertyTypeDeclaration->getType(), TypeKind::PROPERTY);
            if (!$typeNode instanceof Node) {
                // invalid configuration
                throw new ShouldNotHappenException();
            }
            $node->type = $typeNode;
            return $node;
        }
        return null;
    }
    /**
     * @param mixed[] $configuration
     */
    public function configure(array $configuration) : void
    {
        Assert::allIsAOf($configuration, AddPropertyTypeDeclaration::class);
        $this->addPropertyTypeDeclarations = $configuration;
    }
    private function isClassReflectionType(ClassReflection $classReflection, string $type) : bool
    {
        if ($classReflection->hasTraitUse($type)) {
            return \true;
        }
        return $classReflection->isSubclassOf($type);
    }
}
