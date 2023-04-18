# A Laravel Nova WYSIWYG field based on a Quill editor

## ✅ Requirements

- Laravel Nova `4.0` or newer
- Laravel `7.3` or newer

## 🔌 Installation

Install the package via composer.

```bash
composer require nevadskiy/nova-quill-field
````

## 📺 Demo

```php
use Nevadskiy\Quill\Quill;

public function fields(): array
{
    return [
        Quill::make('Content')
            ->withFiles()
            ->theme('bubble')
            ->toolbar([
                [['header' => 2]],
                ['bold', 'italic', 'underline'],
                [['list' => 'ordered'], ['list' => 'bullet']],
                ['blockquote'],
                ['link', 'image', 'video'],
                ['clean'],
            ])
            ->alwaysShow(),
    ];
}
```
