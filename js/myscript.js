$(document).ready(function(){
    let price=$('.price').val();
    let qty=$('.qty').val();
    $('.subtotal').val(price*qty);
    $(document).on('keyup','.qty',function(){
    let pre_col=$(this).parent().prev()
    let price=pre_col.find('.price').val()
    let next_col=$(this).parent().next()
    let subtotal=next_col.find('.subtotal')
    subtotal.val(price*$(this).val())    
    })
    console.log("in script")
    $(document).on('click','.delete',function(event){
        event.preventDefault();
        let status=confirm("are you sure to delete?")
        let tr=$(this).parent().parent();
        let id=tr.attr('id')
        console.log(id)
        if(status)
        {
         $.ajax({
            method:'post',
            url:'delete_customer.php',
            data:{id:id},
            success:function(response){
                   if(response=="success"){
                    location.href="customers.php";
                   }
            }
            
         })   
        }
    })
    $(document).on('change','.product',function(){
        let pno=$(this).val();
        let input_price=$(this).parent().next().find('.price')
        $.ajax({
            method:'post',
            url:'getPrice.php',
            data:{pid:pno},
            success:function(response){
                let col=$(this).parent().next()
                input_price.val(response)
                //$('.price').val(response)
            }
        })
    })
    $(document).on('click','.addmore',function(event){
       event.preventDefault();
        $('.prow').append(`<div class="row my-3">
        <div class="col-md-2">
            <label for="" class="form-label">Product Name</label>
            <select name="pname[]" id="" class="form-select product">
            
            </select>
        </div>
        <div class="col-md-2">
            <label for="" class="form-label">Price</label>
            <input type="double" name="price[]" id="" class="form-control price" value="<?php echo $price;?>">
        </div>
        <div class="col-md-2">
            <label for="" class="form-label">Qty</label>
            <input type="number" name="qty[]" id="" class="form-control qty" value=1 min=1>
        </div>
        
        <div class="col-md-2">
            <label for="" class="form-label">Sub Total</label>
            <input type="double" name="subtotal" id="" class="form-control subtotal">
        </div>
        
        <div class="col-md-2 ">
            <button class='btn btn-danger mt-4 remove'>Remove</button>
        </div>
    </div>`)

    $.ajax({
        method:'post',
        url:'getProducts.php',
        success:function(response){
            //alert(response)
            $('.product').html(response)
            $('.price').val(price)
        }
    })
    })
})