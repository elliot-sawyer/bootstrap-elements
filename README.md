# bootstrap-elements

## installation

`composer require cashware/bootstrap-elements`

## configuration:

```yml
SilverStripe\View\SSViewer:
  themes:
    - '$public'
    - 'cashware/bootstrap-elements:'
    - 'yourtheme'
    - '$default'

Page:
  extensions:
    elemental: DNADesign\Elemental\Extensions\ElementalPageExtension
```
