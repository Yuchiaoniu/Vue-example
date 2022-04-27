<template>
    <div>
        <button class="btn btn-warning text-center"
            v-on:click.prevent="addProductToCart()">
             Add To Cart
        </button>
    </div>
</template>

<script>
    export default {
        data(){
            return{}
        },
        props:['productId', 'userId'],
        methods:{
            async addProductToCart(){

                //check if user login
               if(this.userId == 0){
                   this.$toastr.e('You Need To Login, To add this product in cart');
                   return;
               }

               //if user logged in  then add item into cart
            let response = await axios.post('/cart',{
                    'product_id': this.productId
                });

                this.$root.$emit('changeInCart', response.data.items);

            }
        },
        mounted() {
            console.log('Component mounted.');
        }
    }

    //使用v-on觸發了methods，然後methods定義了response與cartcontroller互動，並使用emit傳出該筆被選取的特定資料
    //，再由cartcontroller做接下去的動作
</script>


