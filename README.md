## Sylius Article Plugin

This plugin is an extension for [BitBagSyliusCmsPlugin](https://github.com/BitBagCommerce/SyliusCmsPlugin/).
It adds your created sections to your application's menu

## Installation

1. Run `composer require plumtreesystems/sylius-article-plugin`

2. Install WYSIWYG editor ([FOS CKEditor](https://symfony.com/doc/master/bundles/FOSCKEditorBundle/usage/ckeditor.html)) 

    `bin/console ckeditor:install`

3. Add plugin dependencies to your config/bundles.php file:
   ```php
   return [
       ...
       FOS\CKEditorBundle\FOSCKEditorBundle::class => ['all' => true], // WYSIWYG editor
       SitemapPlugin\SitemapPlugin::class => ['all' => true], // Sitemap support
       BitBag\SyliusCmsPlugin\BitBagSyliusCmsPlugin::class  => ['all' => true],
       PTS\SyliusArticlePlugin\PTSSyliusArticlePlugin::class => ['all' => true],
   ];

4. Import configuration in your `config/packages/_sylius.yaml` file
    ```yaml
    imports:
        - { resource: "@PTSSyliusArticlePlugin/Resources/config/config.yml" }

5. Import routing in your `config/routes.yaml` file
    ```yaml
    pts_sylius_article_plugin:
      resource: "@PTSSyliusArticlePlugin/Resources/config/routes.yaml"


## Credits

This plugin uses [BitBagSyliusCmsPlugin](https://github.com/BitBagCommerce/SyliusCmsPlugin/) as a dependency
