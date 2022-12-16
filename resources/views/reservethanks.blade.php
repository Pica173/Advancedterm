<x-guest-layout>
  <div class="flex bg-gray-100 min-h-screen items-center min-w-screen body-thanks">
    <div class="box-thanks">
      <h1>ご予約ありがとうございます</h1>
      <div class="mt-8">
        <form method="get" name="form_2" action="/">
          @csrf
          <x-button action="javascript:form_2.submit()" class="">
            {{ __('戻る') }}
          </x-button>
        </form>
      </div>
    </div>
  </div>
</x-guest-layout>