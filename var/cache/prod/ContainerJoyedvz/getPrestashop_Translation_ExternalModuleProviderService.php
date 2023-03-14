<?php

use Symfony\Component\DependencyInjection\Argument\RewindableGenerator;

// This file has been auto-generated by the Symfony Dependency Injection Component for internal use.
// Returns the public 'prestashop.translation.external_module_provider' shared service.

return $this->services['prestashop.translation.external_module_provider'] = new \PrestaShopBundle\Translation\Provider\ExternalModuleLegacySystemProvider(${($_ = isset($this->services['prestashop.translation.database_loader']) ? $this->services['prestashop.translation.database_loader'] : $this->load('getPrestashop_Translation_DatabaseLoaderService.php')) && false ?: '_'}, ($this->targetDirs[3].'\\app/../modules'), ${($_ = isset($this->services['prestashop.translation.legacy_file_loader']) ? $this->services['prestashop.translation.legacy_file_loader'] : $this->load('getPrestashop_Translation_LegacyFileLoaderService.php')) && false ?: '_'}, ${($_ = isset($this->services['prestashop.translation.legacy_module.extractor']) ? $this->services['prestashop.translation.legacy_module.extractor'] : $this->load('getPrestashop_Translation_LegacyModule_ExtractorService.php')) && false ?: '_'}, ${($_ = isset($this->services['prestashop.translation.module_provider']) ? $this->services['prestashop.translation.module_provider'] : $this->load('getPrestashop_Translation_ModuleProviderService.php')) && false ?: '_'});
