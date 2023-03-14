  

<section id="{$moduleName}-displayAdminOrderMainBottom">
  <div class="card mt-2">
    <div class="card-header">
      <h3 class="card-header-title">
        <img src="{$moduleLogoSrc}" alt="{$moduleDisplayName}" width="20" height="20">
        {$moduleDisplayName}
      </h3>
    </div>
    <div class="card-body">
      <p>{l s='This order has been paid with %moduleDisplayName%.' mod='paymongo' sprintf=['%moduleDisplayName%' => $moduleDisplayName]}</p>
    </div>
  </div>
</section>
