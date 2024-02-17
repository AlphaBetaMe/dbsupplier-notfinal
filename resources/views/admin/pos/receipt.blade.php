
<div class="printPage" id="invoicePos">
        <div id="top">
            <center>
                <div class="logo">
                    <img src="public\asset\whey.png" style="width:150px;">
                </div>
                <div class="info"></div>
                <h2>WheyFactory PH</h2>
            </center>
        </div>
        
        <div class="mid">
            <div class="info">
                <h4>Contact Details</h4>
                <p>
                Cainta, Rizal<br>
                    Phone. (123) 456-7890<br>
                    Email: info@wheyfactory.com
                </p>
            </div>
        </div>
     
        <div class="bottom">
            <div class="" id="table">
                <table>
                    <tr class="tabletitle">
                        <td class="item">Item</td>
                        <td class="Rate">Price</td>
                        <td class="Hours">Qty</td>
                        <td class="Rate">Discount</td>
                        <td class="Rate">Sub Total</td>
                    </tr>
                 @foreach($posOrderReceipt as $receipt)
                    <tr class="service">
                        <td class="tableitem"><p class="itemtext">{{$receipt->product->name}}</p></td>
                        <td class="tableitem"><p class="itemtext">{{ number_format($receipt->posPrice,2)}}</p></td>
                        <td class="tableitem"><p class="itemtext">{{$receipt->posQuantity}}</p></td>
                        <td class="tableitem"><p class="itemtext">{{$receipt->discount ? ' ':'0'}}</p></td>
                        <td class="tableitem"><p class="itemtext">{{number_format($receipt->posTotal_amount,2)}}</p></td>
                    </tr>
                   
                    @endforeach
                    <tr class="tabletitle">
                        <td></td>
                        <td></td>
                        <td></td>
                        <td class="Rate">TOTAL</td>
                        <td class="Payment">
                            <h2>{{number_format($posOrderReceipt->sum('posPrice'),2)}}</h2>
                         </td>
                    </tr>
                </table>
                
                <div class="legalcopy">
                    <p>
                        <strong>*** Thank you for your visiting ***</strong><br>
                        <label>Proverbs 16:9 :</label>
                        <label>Commit to the lord whatever you do and your plans will succeed.</label>
                    </p>
                </div>
                <div class="serial-number">
                    
                </div>
            </div>
        </div>
    </div>
<style>
        #invoicePos{
            box-shadow: 0 0 1in -0.25in rgb(0, 0,0.5);
            padding:2mm;
            margin:0 auto;
            width:75mm;
            background: #fff;
        }
        #invoicePos::selection{
            background: #f315f3;
            color:#fff;
        }
        #invoicePos ::-moz-selection{
            background: #410941;
            color:#fff; 
        }
        #invoicePos h2{
            font-size: 1.2em;
           
        }
        #invoicePos h4{
            font-size: 0.9em;
            color: #222;
        }
        #invoicePos p{
            font-size: 0.6em;
            line-height: 1.1em;
            color: #666;
        }
        #invoicePos #top, #invoicePos #mid, #invoicePos #bottom
        {
            border-bottom:1px solid #eee;
        }

        #invoicePos .top{
            min-height: 100px;
        }
        #invoicePos .mid{
            min-height: 80px;
        }
        #invoicePos .bottom{
            min-height: 50px;
        }

        #invoicePos .bottom .legalcopy{
            min-height: 50px;
            display: block;
            margin-left: 0;
            text-align: center;
        }
        #invoicePos .mid .info
        {
            display: block;
            margin-left: 0;
            text-align: center;
        }
        #invoicePos table{
            width:100%;
            border-collapse:collapse;
        }
        #invoicePos .tabletitle{
            font-size:0.8em;
            background: #eee;
        }
        #invoicePos .item{
            width: 24mm;
        }
        #invoicePos .itemtext{
            width: 0.5em;
        }
    </style>

