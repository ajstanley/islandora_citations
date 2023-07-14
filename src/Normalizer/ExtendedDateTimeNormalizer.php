<?php

namespace Drupal\islandora_citations\Normalizer;

use Drupal\controlled_access_terms\Plugin\Field\FieldType\ExtendedDateTimeFormat;

/**
 * Converts EDTF fields to an array including computed values.
 */
class ExtendedDateTimeNormalizer extends NormalizerBase {

  /**
   * The interface or class that this Normalizer supports.
   *
   * @var string
   */
  protected $supportedInterfaceOrClass = ExtendedDateTimeFormat::class;

  /**
   * {@inheritdoc}
   */
  public function normalize($object, $format = NULL, array $context = []) {
    $dateValue = $object->getValue();
    if (!empty($dateValue['value'])) {
      $dateParts = explode('-', $dateValue['value']);
    }

    return $this->formatDateVariables($dateParts ?? $dateValue);
  }

}