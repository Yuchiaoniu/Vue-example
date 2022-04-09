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
</script>
