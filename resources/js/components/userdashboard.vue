<template>
    <div>
    <div class="page-heading-area">
      <div class="container">
        <div class="row">
          <div class="col-md-12 text-center">
            <h2 class="page-heading">Dashboard
            </h2><!--/.page-heading-->
          </div><!--/.col-md-12-->
        </div><!--/.row-->
      </div><!--/.container--> 
    </div><!--/.page-heading-area-->
    <div class="page-nav-area">
      <div class="container">
        <div class="row">
          <div class="col-md-12">
            <ul class="breadcrumb page-nav list-unstyled">
              <li><router-link to="/">Home</router-link></li>
              <li>Dashboard
              </li>
            </ul><!--/.page-nav-->
          </div><!--/.col-md-12-->
        </div><!--/.row-->
      </div><!--/.container-->
    </div><!--/.page-title-area-->    

    
    <div class="d-flex container" id="wrapper">

    <!-- Sidebar -->
    <UserSidebar />    
    <!-- /#sidebar-wrapper -->

    <!-- Page Content -->
    <div id="page-content-wrapper">       
    <div v-if = "creservations == 0" class="alert alert-info" role="alert" align="center">You havent made any reservation</div>       

      <div v-else class="container-fluid">        
          <table class="table">
            <thead class="thead-dark">
              <tr>
                <th scope="col">Room Number</th>
                <th scope="col">Arrival</th>
                <th scope="col">Departure</th>
                <th scope="col">Reserved On</th>
                <th scope="col">Amount Paid</th>
                <th scope="col">Duration</th>
                <th scope="col">Status</th>
              </tr>
            </thead>
            <tbody>
              <tr v-for="reserve in reservations" :key="reserve.id">               
                <th scope="row">RM{{reserve.room.room_number}}</th>
                <td>{{reserve.arrival}}</td>
                <td> {{reserve.departure}}</td>
                <td>{{reserve.created_at}}  </td>
                <td>{{reserve.payment}}NGN </td>
                <td>{{reserve.night}}Nights <br> {{reserve.adult}} Adult(s) and {{reserve.children}}Childre(s) </td>
                <td v-if = "reserve.confirm == 1" class="text-success"> Approved</td>
                <td v-else class="text-danger"> Pending</td>
              </tr>             
            </tbody>
          </table>
      </div>
    </div>
    <!-- /#page-content-wrapper -->

  </div>
  </div>
  <!-- /#wrapper -->

</template>

<script>
    import Sidebar from './UserSidebar'
     export default {
       data(){
            return {
              reservations: {},                          
              creservations: '',
            }
        },
        methods:{
          loadReservations(){                                            
                // this.loading = true;
                axios.get("../api/userreservations")
                .then((response)  =>  {
                    setTimeout(function(){
                    NProgress.done()
                    }, 2000);
                    this.reservations = response.data;
                })              
                 axios.get("../api/cuserreservations")
                .then((response)  =>  {                    
                    this.creservations = response.data;
                }) 
            },                                   
        },            
        mounted() {
            console.log('Component mounted.')                        
            this.loadReservations(); 
            Fire.$on('afterAction', () => {this.loadReservations()})                                   
        }
    }
</script>
