@if (old("sucesso"))
	<div class="o-toast--success js-timeOut" role="alert">
  		<p class="is-textUpper o-toast__message"><i class="icon-ok-circled"></i>{{old("sucesso")}}</p>
	</div>
@endif
@if (old("erro"))
	<div class="o-toast--error" role="alert">
		<p class="is-textUpper o-toast__message"><i class="icon-cancel-circled"></i>{{old("erro")}}</p>
		<button class="o-toast__close" onclick="ToastController.close(this.parentNode);"><i class="icon-cancel"></i></button>
	</div>
@endif