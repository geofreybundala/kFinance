


<template>
    <div >
        <!-- {{-- DASHBOARD STATISTIC --}} -->
                  <div class="row">
    <div class="col-lg-3 col-md-6 col-sm-6">
        <div class="card card-stats">
            <div class="card-header card-header-warning card-header-icon">
                <div class="card-icon">
                    <i class="material-icons">message</i>
                </div>
                <p class="card-category">Sms Remains</p>
                <h3 class="card-title">{{sms_counter}}
                   
                </h3>
            </div>
            <div class="card-footer">
                <div class="stats">
                    <i class="material-icons text-danger">expand_more</i>
                    <a href=""> More </a>
                </div>
            </div>
        </div>
    </div>
    <div class="col-lg-3 col-md-6 col-sm-6">
        <div class="card card-stats">
            <div class="card-header card-header-success card-header-icon">
                <div class="card-icon">
                    <i class="material-icons">store</i>
                </div>
                <p class="card-category">Members</p>
            <h3 class="card-title">56</h3>
            </div>
            <div class="card-footer">
                <div class="stats">
                    <i class="material-icons">expand_more</i>
                    <a href="">More</a>
                </div>
            </div>
        </div>
    </div>
    <div class="col-lg-3 col-md-6 col-sm-6">
        <div class="card card-stats">
            <div class="card-header card-header-danger card-header-icon">
                <div class="card-icon">
                    <i class="material-icons">group</i>
                </div>
                <p class="card-category">System User</p>
                <h3 class="card-title">87</h3>
            </div>
            <div class="card-footer">
                <div class="stats">
                    <i class="material-icons">expand_more</i> 
                    <a href="#">More</a>
                </div>
            </div>
        </div>
    </div>
    <div class="col-lg-3 col-md-6 col-sm-6">
        <div class="card card-stats">
            <div class="card-header card-header-info card-header-icon">
                <div class="card-icon">
                    <i class="material-icons">send</i>
                </div>
                <p class="card-category">Sms send</p>
                <h3 class="card-title">54</h3>
            </div>
            <div class="card-footer">
                <div class="stats">
                    <i class="material-icons">expand_more</i> 
                    <a href="">More</a>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- {{-- END OF DASHBOARD STATISTICS --}} -->

<!-- {{-- TIME MANAGEMENT --}} -->

      <div class="row">
                          <div class="col-md-6">
                          <div class="card ">
                           <div class="card-header h3" style="background: linear-gradient(80deg, #63ca8e, #37775f); color:white">CURRENT TIME</div>
                           <div class="card-body"> 
                           <span class="timer_body">{{ new Date() | moment('dddd, MMMM Do YYYY, h:mm a') }}</span>
                          </div>
                          </div>
                          </div>
                          

                             <div class="col-md-6">
                          <div class="card">
                           <div class="card-header h3" style="background: linear-gradient(80deg, #7e2109fd, #ec280e);color:white">TIME FOR AUTOSMS </div>
                            <div class="card-body "> 
                            <span  class="timer_body "><span> <i class="fa fa-bell"></i> &nbsp; {{time_checker}}</span></span> {{message}} <span class="pull-right material-icons" style="color:green"><a style="text-decoration:none" @click='show_timer()' data-toggle="modal" data-target="#update">settings</a></span>
                          </div>
                          </div>
                          </div>
                          <!-- UPDATE TIMER  -->
                               <div class="modal fade" id="update" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title ml-2">SET TIMER(Hours)</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">      
                  

             

                
                     <div class="form-group row">
                            <label for="timer" class="col-sm-3 col-form-label">Hours</label>
                            <div class="col-sm-9">
                                <input type="number" class="form-control" id="name" v-model="show.timer" placeholder="set Hours for autosms" required>
                            </div>
                        </div>


                        <div class="form-group row">
                             <label for="timer" class="col-sm-3 col-form-label"></label>
                            <div class="col-sm-9">
                                <button @click="update_timer(show.timer)" class="btn  btn-primary">Update <span class="fa fa-chevron-circle-right"></span></button>
                            </div>
                        </div>
                  
                </div>

            </div>
        </div>
    </div> 
                          <!-- END UPDATE TIMER  -->

                </div>
<!-- {{-- END TIME MANAGEMENT --}} -->
    </div>
</template>

<script>
    export default {
        data(){
            return{
                       time_checker:'',
                       message:'',
                       sms_counter:'',
                       show:[],
            }
        },
        mounted() {
            this.getTime();
            this.getSMS();
            this.autorefresh();
        },methods:{
            getTime(){
                    axios.get('http://127.0.0.1:4500/api/dashboard-timer').then(
                        response=>{
                               this.time_checker =response.data.data;
                               if(response.data.status== 1){
                                      this.message ="Before";
                               }else if(response.data.status== -1){
                                        this.message ="Ago";
                               }else{
                                 this.message ="";
                               }
                        }
                    )
            },getSMS(){
                  axios.get('http://127.0.0.1:4500/api/balance').then(
                      response=>{
                          this.sms_counter = response.data.data;
                          
                      }
                  )
            },
               show_timer(){
                   axios.get('http://127.0.0.1:4500/api/dashboard-show-timer').then(
                       response=>{
                           this.show = response.data.data;
                       }
                   )

                },update_timer(timer){
                       var data ={
                       timer:timer
                    
                   }
                    axios.put('http://127.0.0.1:4500/api/dashboard-update-timer',data).then(response=>{
                           if(response.data.status == 200){
                        this.getTime();
                        const Toast = this.$swal.mixin({
                              toast: true,
                                 position: 'top-end',
                                 showConfirmButton: false,
                                  timer: 4000
                                            });

                                    Toast.fire({
                                             type: 'success',
                                             title: response.data.message
                                              })

                    }
                       else {
                                const Toast = this.$swal.mixin({
                              toast: true,
                                 position: 'top-end',
                                 showConfirmButton: false,
                                  timer: 4000
                                            });

                                    Toast.fire({
                                             type: 'warning',
                                             title: response.data.message
                                              })

                       }

                    })

                }
            ,autorefresh(){
                var that = this;
               setInterval(function(){
                                  
                   that.getTime();
                   that.getSMS();
               
               
               },5000);
                
            }

    
            
        }
    }
</script>