<template>
   <div class="bg-light border-right" id="sidebar-wrapper">
      <div class="sidebar-heading">Admin Panel </div>
      <div class="list-group list-group-flush">
        <router-link to="dashboard" class="list-group-item list-group-item-action bg-light">Dashboard</router-link>        
        <router-link to="rooms" class="list-group-item list-group-item-action bg-light">Rooms</router-link>
        <router-link to="reservations" class="list-group-item list-group-item-action bg-light">Reservations</router-link>
        <router-link to="confirm-reservation" class="list-group-item list-group-item-action bg-light">Confirm Reservations</router-link>
        <router-link to="users" class="list-group-item list-group-item-action bg-light">Users</router-link>
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
