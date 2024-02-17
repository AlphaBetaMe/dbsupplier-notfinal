@extends('layouts.sample')

@section('content')

<div class="container-fluid mt-3">

   
    @livewire('orders')

</div>

<div class="modal">
    <div class="" id="print">
        @include('admin.pos.receipt')
    </div>
</div>

        <!-- PrintReceipt section -->
<script>

function PrintReceiptContent(el){
    var data = '<input type="button" id="printPageButton class="printPageButton" style="display:block; width=100%; border:none; background-color:#008B8B; color:#fff; padding:14px 28px; font-size:16px; cursor:pointer; text-align:center" value="Print Receipt" onClick="window.print()">';

        data += document.getElementById(el).innerHTML;
        myResibo = window.open("","myWin", "left=150, top=130, width=400, height=400");
            myResibo.screnX=0;
            myResibo.screnY=0;
            myResibo.document.write(data);

            myResibo.document.title = "Print Receipt";
        myResibo.focus();

        setTimeout(() => {
            myResibo.close();
        }, 8000);
}

</script>

@endsection