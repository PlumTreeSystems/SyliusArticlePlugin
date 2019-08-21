<?php


namespace PTS\SyliusBlogPlugin\Controller;


use FOS\RestBundle\View\View;
use Sylius\Bundle\ResourceBundle\Controller\ResourceController;
use Sylius\Component\Resource\ResourceActions;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

class TaxonController extends ResourceController
{
    public function indexAction(Request $request): Response
    {
        $configuration = $this->requestConfigurationFactory->create($this->metadata, $request);

        $routeName = $request->attributes->get('_route');
        $this->isGrantedOr403($configuration, ResourceActions::INDEX);
        $resources = $this->resourcesCollectionProvider->get($configuration, $this->repository);

        $this->eventDispatcher->dispatchMultiple(ResourceActions::INDEX, $configuration, $resources);

        $view = View::create($resources);

        if ($configuration->isHtmlRequest()) {
            if (
                $routeName == 'sylius_shop_partial_taxon_index_by_code'
            ) {

                $sectionRepository = $this->get('bitbag_sylius_cms_plugin.repository.section');
                $sections = $sectionRepository->findAll();

                $view
                    ->setTemplate('@PTSSyliusBlogPlugin/Shop/_horizontalMenu.html.twig')
                    ->setTemplateVar($this->metadata->getPluralName())
                    ->setData([
                        'configuration' => $configuration,
                        'metadata' => $this->metadata,
                        'resources' => $resources,
                        'sections' => $sections,
                        $this->metadata->getPluralName() => $resources,
                    ]);
            } else {
                $view
                    ->setTemplate($configuration->getTemplate(ResourceActions::INDEX . '.html'))
                    ->setTemplateVar($this->metadata->getPluralName())
                    ->setData([
                        'configuration' => $configuration,
                        'metadata' => $this->metadata,
                        'resources' => $resources,
                        $this->metadata->getPluralName() => $resources,
                    ]);
            }
        }

        return $this->viewHandler->handle($configuration, $view);
    }
}