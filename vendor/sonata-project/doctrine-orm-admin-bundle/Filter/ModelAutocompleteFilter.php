<?php

/*
 * This file is part of the Sonata package.
 *
 * (c) Thomas Rabaix <thomas.rabaix@sonata-project.org>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Sonata\DoctrineORMAdminBundle\Filter;

use Doctrine\Common\Collections\Collection;
use Sonata\AdminBundle\Datagrid\ProxyQueryInterface;
use Sonata\CoreBundle\Form\Type\EqualType;

class ModelAutocompleteFilter extends Filter
{
    /**
     * {@inheritdoc}
     */
    public function filter(ProxyQueryInterface $queryBuilder, $alias, $field, $data)
    {
        if (!$data || !is_array($data) || !array_key_exists('value', $data)) {
            return;
        }

        if ($data['value'] instanceof Collection) {
            $data['value'] = $data['value']->toArray();
        }

        if (is_array($data['value'])) {
            $this->handleMultiple($queryBuilder, $alias, $data);
        } else {
            $this->handleModel($queryBuilder, $alias, $data);
        }
    }

    /**
     * For the record, the $alias value is provided by the association method (and the entity join method)
     *  so the field value is not used here.
     *
     * @param \Sonata\AdminBundle\Datagrid\ProxyQueryInterface $queryBuilder
     * @param string                                           $alias
     * @param mixed                                            $data
     *
     * @return mixed
     */
    protected function handleMultiple(ProxyQueryInterface $queryBuilder, $alias, $data)
    {
        if (count($data['value']) == 0) {
            return;
        }

        $parameterName = $this->getNewParameterName($queryBuilder);

        if (isset($data['type']) && $data['type'] == EqualType::TYPE_IS_NOT_EQUAL) {
            $this->applyWhere($queryBuilder, $queryBuilder->expr()->notIn($alias, ':'.$parameterName));
        } else {
            $this->applyWhere($queryBuilder, $queryBuilder->expr()->in($alias, ':'.$parameterName));
        }

        $queryBuilder->setParameter($parameterName, $data['value']);
    }

    /**
     * @param \Sonata\AdminBundle\Datagrid\ProxyQueryInterface $queryBuilder
     * @param string                                           $alias
     * @param mixed                                            $data
     *
     * @return mixed
     */
    protected function handleModel(ProxyQueryInterface $queryBuilder, $alias, $data)
    {
        if (empty($data['value'])) {
            return;
        }

        $parameterName = $this->getNewParameterName($queryBuilder);

        if (isset($data['type']) && $data['type'] == EqualType::TYPE_IS_NOT_EQUAL) {
            $this->applyWhere($queryBuilder, sprintf('%s != :%s', $alias, $parameterName));
        } else {
            $this->applyWhere($queryBuilder, sprintf('%s = :%s', $alias, $parameterName));
        }

        $queryBuilder->setParameter($parameterName, $data['value']);
    }

    /**
     * {@inheritdoc}
     */
    protected function association(ProxyQueryInterface $queryBuilder, $data)
    {
        $associationMappings = $this->getParentAssociationMappings();
        $associationMappings[] = $this->getAssociationMapping();
        $alias = $queryBuilder->entityJoin($associationMappings);

        return array($alias, false);
    }

    /**
     * {@inheritdoc}
     */
    public function getDefaultOptions()
    {
        return array(
            'field_name'       => false,
            'field_type'       => 'sonata_type_model_autocomplete',
            'field_options'    => array(),
            'operator_type'    => 'sonata_type_equal',
            'operator_options' => array(),
        );
    }

    /**
     * {@inheritdoc}
     */
    public function getRenderSettings()
    {
        return array('sonata_type_filter_default', array(
            'field_type'       => $this->getFieldType(),
            'field_options'    => $this->getFieldOptions(),
            'operator_type'    => $this->getOption('operator_type'),
            'operator_options' => $this->getOption('operator_options'),
            'label'            => $this->getLabel(),
        ));
    }
}
