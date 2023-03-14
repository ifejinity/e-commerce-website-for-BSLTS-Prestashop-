  

{extends "$layout"}

{block name="content"}
  <section id="paymongo-external" class="card card-block mb-2">
    <p>{l s='This page simulate an external payment gateway : Order will be created with OrderState "Remote payment accepted".' mod='paymongo'}</p>
    <form action="{$action}" method="post" class="form-horizontal mb-1">
      <div class="text-sm-center">
        <button type="submit" class="btn btn-primary">
          {l s='Pay' mod='paymongo'}
        </button>
      </div>
    </form>
  </section>
{/block}
