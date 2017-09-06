<template>
    <div class="well">
        <h3 v-text="item.name"></h3>
        <h4>{{ item.price | currency('$', 0) }}</h4>

        <p>Bedrooms: <span v-text="item.bedrooms"></span></p>
        <p>Bathrooms: <span v-text="item.bathrooms"></span></p>
        <p>Garages: <span v-text="item.garages"></span></p>
        <p>Storeys: <span v-text="item.storeys"></span></p>
    </div>
</template>

<script>
    export default {
        props: ['item']
    }
</script>
