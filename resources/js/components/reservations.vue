<template>
    <div>
    <div class="page-heading-area">
      <div class="container">
        <div class="row">
          <div class="col-md-12 text-center">
            <h2 class="page-heading">Reservations
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
              <li>Reservations
              </li>
            </ul><!--/.page-nav-->
          </div><!--/.col-md-12-->
        </div><!--/.row-->
      </div><!--/.container-->
    </div><!--/.page-title-area-->    

    
    <div class="d-flex container" id="wrapper">

    <!-- Sidebar -->
    <Sidebar />    
    <!-- /#sidebar-wrapper -->

    <!-- Page Content -->
    <div id="page-content-wrapper">

      <div class="container-fluid">        
          <table class="table">
            <thead class="thead-dark">
              <tr>
                <th scope="col">Room Number</th>
                <th scope="col">Arrival</th>
                <th scope="col">Departure</th>
                <th scope="col">Reserved By</th>
                <th scope="col">Reserved On</th>
                <th scope="col">Amount Paid</th>
                <th scope="col">Duration</th>
              </tr>
            </thead>
            <tbody>
              <tr v-for="reserve in reservations" :key="reserve.id">               
                <th scope="row">RM{{reserve.room.room_number}}</th>
                <td>{{reserve.arrival}}</td>
                <td> {{reserve.departure}}</td>
                <td>{{reserve.user.name}}</td>
                <td>{{reserve.created_at}}  </td>
                <td>{{reserve.payment}}NGN </td>
                <td>{{reserve.night}}Nights <br> {{reserve.adult}} Adult(s) and {{reserve.children}}Childre(s) </td>
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
    import Sidebar from './Sidebar'
    export default {
       data(){
            return {
              reservations: {},
              form: new Form({
                    id: '',
                    room_number: '',
                    room_name: '',
                    room_price: '',
                    room_description: '',
                    image: '',
                    tv: '',
                    breakfast: '',
                    wifi: '',
                    soundproof: '',
                    computer: '',
                    ac: ''
                })              
            }
        },
        methods:{
          loadReservations(){                                            
                // this.loading = true;
                axios.get("../api/reservations")
                .then((response)  =>  {
                    setTimeout(function(){
                    NProgress.done()
                    }, 2000);
                    this.reservations = response.data;
                })              
            },          
            // loadStaffs(){                            
            //      axios.get('api/staff').then(({data}) => (this.staffs = data));                 
            // },
            // imageFunction(e){
            //   console.log('effkhkdfjkdfjkdf');
            //   let file = e.target.files[0];
            //   let reader = new FileReader();
            //   reader.onloadend = (file) => {
            //     this.form.image = reader.result;
            //   }
            //   reader.readAsDataURL(file);
            // },
            editModal(room){
              $('#editroom').modal('show');
              this.form.fill(room);              
            },             
            updateRoom(){
                $('.updateroom').html('<i class="fa fa-spin fa-spinner"></i>');
                this.form.put('../api/rooms/'+this.form.id).then(
                    ()=>{
                        Fire.$emit('afterAction');
                        $('#editroom').modal('hide');
                        toast.fire({
                        type: 'success',
                        title: 'Room Updated Successfully'
                        })   
                        $('.updateroom').html('Update Room'); 
                    }).catch(
                        ()=>{
                        toast.fire({
                        type: 'error',
                        title: 'Data not correctly inputed'
                        })   
                        $('.updateroom').html('Update Room');
                        });                                      
            }
        },        
        mounted() {
            console.log('Component mounted.')                        
            this.loadReservations(); 
            Fire.$on('afterAction', () => {this.loadReservations()})                                   
        }
    }
</script>

