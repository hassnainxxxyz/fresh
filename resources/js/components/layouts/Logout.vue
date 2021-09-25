<template>
    <div>

    </div>
</template>


<script>
    export default {
        beforeCreate() {

    window.history.pushState({}, document.title, "/" + "");

          if(sessionStorage.getItem('redirectURL')) {
              sessionStorage.removeItem('redirectURL');
          }

          axios({
              method: 'post',
              url: APIURL+'/api/logout',
              headers: {
                  authorization: 'Bearer '+localStorage.getItem('token'),
              }
          })
              .then(res => {


                  if(res.data.code === 200) {
                      if(isAdmin(JSON.parse(localStorage.getItem('user')))) {

                          localStorage.removeItem('token');

                          localStorage.removeItem('user');
                          localStorage.clear();
                          location.href = '/';
                      } else {
                          localStorage.removeItem('token');

                          localStorage.removeItem('user');
                          localStorage.clear();
                          this.$router.push({name: 'home'});

                      }




                  }

              });






        },
    }
</script>