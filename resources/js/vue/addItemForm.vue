<template>
    <div class="addItem">
        <input class="form-control  mr-3" type="text" v-model="item.name">
        <font-awesome-icon
            icon="plus-square"
            class="fa-2x"
            :class="[item.name ? 'active': 'inactive']"
            @click="addItem()"
        />


    </div>
</template>

<script>
export default {
    data: function () {
        return{
            item: {
                name: ""
            }
        }
    },
    methods:{
        addItem(){
            if(this.item.name==''){
                return;
            }

            axios.post('api/item/store',{
                item : this.item
            })
            .then(response=>{
                if(response.status == 201){
                    this.item.name = "";
                    this.$emit('reloadlist');
                }
            })
            .catch(error=>{
                console.log(error)
            })
        }
    }
}
</script>

<style>
.addItem{
    display: flex;
    justify-content: center;
    align-items: center;
}

.active{
    color: #00ce25;
}

.inactive{
    color: #999999;
}
</style>
