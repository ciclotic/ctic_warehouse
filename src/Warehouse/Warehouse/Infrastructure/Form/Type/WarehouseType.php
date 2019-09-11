<?php

namespace CTIC\Warehouse\Warehouse\Infrastructure\Form\Type;

use CTIC\App\Company\Domain\Company;
use CTIC\App\Company\Infrastructure\Repository\CompanyRepository;
use CTIC\App\Base\Infrastructure\Form\Type\AbstractResourceType;
use CTIC\App\Base\Infrastructure\Doctrine\Form\Type\EntityType;
use CTIC\App\Permission\Domain\PermissionInterface;
use CTIC\Warehouse\Warehouse\Domain\WarehouseInterface;
use Symfony\Component\Form\Extension\Core\Type\CheckboxType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\NumberType;
use Symfony\Component\Form\Extension\Core\Type\PasswordType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;

final class WarehouseType extends AbstractResourceType
{
    /**
     * {@inheritdoc}
     */
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->setMethod('POST')
            ->add('company',  EntityType::class, [
                'label' => 'Empresa',
                'class' => Company::class,
                'query_builder' => function (CompanyRepository $er) {
                    return $er
                        ->createQueryBuilder('a');
                },
                'choice_label' => 'taxName'
            ])
            ->add('name', TextType::class, [
                'label' => 'Nombre',
            ])
            ->add('address', TextType::class, [
                'label' => 'Dirección',
            ])
            ->add('postalCode', TextType::class, [
                'label' => 'Código postal',
            ])
            ->add('town', TextType::class, [
                'label' => 'Ciudad o Población',
            ])
            ->add('country', TextType::class, [
                'label' => 'País',
            ])
            ->add('enabled', ChoiceType::class, [
                'label'     => 'Habilitado',
                'choices'   => array(
                    'Si'    => 1,
                    'No'    => 0
                )
            ])
        ;
    }

    /**
     * {@inheritdoc}
     */
    public function getBlockPrefix(): string
    {
        return 'ctic_app_warehouse';
    }
}
