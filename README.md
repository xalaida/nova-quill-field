# A Laravel Nova WYSIWYG field based on a Quill editor.

## Demo

```php
public function fields(): array
{
    return [
        Quill::make('Content')
            ->withFiles()
            ->theme('bubble')
            ->toolbar([
                [['header' => 2]],
                ['bold', 'italic', 'underline'],
                [['list' => 'ordered'], ['list' => 'bullet' ]],
                ['blockquote'],
                ['link', 'image', 'video'],
                ['clean'],
            ])
            ->alwaysShow(),
    ];
}
```
