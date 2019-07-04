<template>
   <div class="bg-light border-right" id="sidebar-wrapper">
      <div class="sidebar-heading">My Dashboard </div>
      <div class="list-group list-group-flush">
        <router-link to="dashboard" class="list-group-item list-group-item-action bg-light">Reservation History</router-link>        
        <router-link to="profile" class="list-group-item list-group-item-action bg-light">Profile Details</router-link>        
      </div>
    </div>
</template>

<script>
    export default {
        mounted() {
            console.log('Component mounted.')
        }
    }
</script>
