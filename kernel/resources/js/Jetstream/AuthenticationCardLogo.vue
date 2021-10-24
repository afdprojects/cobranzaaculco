<template>
    <Link :href="'/'">
        <img src="http://sdca.com/images/sdca.png" width="120" height="120">
    </Link>
</template>

<script>
    import { Link } from '@inertiajs/inertia-vue3';

    export default {
        components: {
            Link,
        },
    }
</script>
