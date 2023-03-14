  

<section id="{$moduleName}-displayAdminOrderLeft">
  <div class="panel">
    <div class="panel-heading">
      <img src="{$moduleLogoSrc}" alt="{$moduleDisplayName}" width="15" height="15">
      {$moduleDisplayName}
    </div>
    <p>{l s='This order has been paid with %moduleDisplayName%.' mod='paymongo' sprintf=['%moduleDisplayName%' => $moduleDisplayName]}</p>
  </div>
</section>
