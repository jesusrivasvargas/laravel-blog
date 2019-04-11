<template>
    <div>
        <div class="avatar-zone">
            <img :src="avatarurl" height="100px" width="100px">
        </div>
    
        <form method="post" :action="storeurl" 
            enctype="multipart/form-data">
            <slot></slot> 

            <input type="file" name="avatar" accept="image/*" 
                onchange="this.form.submit()"
                class="upload_btn">
            <div class="overlay-layer">Subir foto</div>
            
        </form>
    </div>
</template>

<script>
    export default {
        props: ['avatarurl', 'storeurl'],     
    }
</script>