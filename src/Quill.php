<?php

namespace Nevadskiy\Quill;

use Laravel\Nova\Exceptions\NovaException;
use Laravel\Nova\Fields\Expandable;
use Laravel\Nova\Fields\Field;
use Laravel\Nova\Fields\HasAttachments;
use Laravel\Nova\Contracts\Storable as StorableContract;

class Quill extends Field implements StorableContract
{
    use Expandable,
        HasAttachments;

    /**
     * @inheritdoc
     */
    public $component = 'quill-nova-field';

    /**
     * @inheritdoc
     */
    public $showOnIndex = false;

    /**
     * @inheritDoc
     */
    public function showOnIndex($callback = true)
    {
        throw NovaException::helperNotSupported(__FUNCTION__, static::class);
    }

    /**
     * Specify a Quill theme.
     */
    public function theme(string $theme): static
    {
        return $this->withMeta(['theme' => $theme]);
    }

    /**
     * Specify a Quill toolbar.
     */
    public function toolbar($toolbar): static
    {
        return $this->withMeta(['toolbar' => $toolbar]);
    }

    /**
     * Specify Quill options.
     */
    public function options(array $options): static
    {
        return $this->withMeta(['options' => $options]);
    }

    /**
     * Prepare the element for JSON serialization.
     *
     * @return array
     */
    public function jsonSerialize(): array
    {
        return array_merge(parent::jsonSerialize(), [
            'shouldShow' => $this->shouldBeExpanded(),
        ]);
    }
}
