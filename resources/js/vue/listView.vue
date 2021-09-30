<template>
    <div>
        <div v-for="(item, index) in items" :key="index">
            <list-item
                :item="item"
                class="p-1 my-1"
                style="background: #e6e6e6"
                v-on:itemchanged="$emit('reloadlist')"
            />
        </div>
    </div>
</template>

<script>
import listItem from "./listItem";

export default {
    props: ['items'],
    components:{
        listItem
    }
}
</script>
