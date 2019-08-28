## Sylius Blog Plugin

This plugin allows you to have a blog in your sylius application

## Installation

1. Run `composer require plumtreesystems/sylius-blog-plugin`

2. Install WYSIWYG editor ([FOS CKEditor](https://symfony.com/doc/master/bundles/FOSCKEditorBundle/usage/ckeditor.html)) 

    `bin/console ckeditor:install`

3. Add plugin dependencies to your config/bundles.php file:
   ```
   return [
       ...
       FOS\CKEditorBundle\FOSCKEditorBundle::class => ['all' => true], // WYSIWYG editor
       SitemapPlugin\SitemapPlugin::class => ['all' => true], // Sitemap support
       BitBag\SyliusCmsPlugin\BitBagSyliusCmsPlugin::class  => ['all' => true],
       PTS\SyliusBlogPlugin\PTSSyliusBlogPlugin::class => ['all' => true],
   ];

4. Import configuration in your `config/packages/_sylius.yaml` file
    ```
    imports:
        - { resource: "@PTSSyliusBlogPlugin/Resources/config/config.yml" }

5. Import routing in your `config/routes.yaml` file
    ```
    bitbag_sylius_cms_plugin:
      resource: "@BitBagSyliusCmsPlugin/Resources/config/routing.yml"


## Credits

This plugin uses [BitBagSyliusCmsPlugin](https://github.com/BitBagCommerce/SyliusCmsPlugin/)
