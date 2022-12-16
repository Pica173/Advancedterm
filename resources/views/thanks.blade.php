<x-guest-layout>
  <div class="flex bg-gray-100 min-h-screen items-center min-w-screen body-thanks">
    <div class="box-thanks">
      <h1>会員登録ありがとうございます</h1>
      <div class="mt-8">
        <form method="get" name="form_3" action="/mypage">
          @csrf
          <x-button action="javascript:form_3.submit()" class="">
            {{ __('ログインする') }}
          </x-button>
        </form>
      </div>
    </div>
  </div>
</x-guest-layout>