<template>
     <footer class="site-footer">
      <div class="container">
        <div class="row">
          <div class="col-sm-3 col-md-3">
            <h6>Roadmap AI</h6>
            <p class="text-justify">
                A free open-source resume builder that simplifies the process of creating,
                updating, and sharing your resume.
            </p>
            <ul class="social-icons">
              <li><a class="facebook" href="#"><i class="fab fa-facebook"></i></a></li>
              <li><a class="twitter" href="#"><i class="fab fa-twitter"></i></a></li>
              <li><a class="dribbble" href="#"><i class="fab fa-dribbble"></i></a></li>
              <li><a class="linkedin" href="#"><i class="fab fa-linkedin"></i></a></li>

              </ul>
          </div>
          
          <div class="col-xs-3 col-md-3">
            
          </div>

          <div class="col-xs-3 col-md-3">
            <h6>Dashboard</h6>
            <ul class="footer-links">
              <li><a href="">Help Center</a></li>
              <li><a href="">Terms of Services</a></li>
              <li><a href="">Legal</a></li>
              <li><a href="">Privacy Policy</a></li>
              <li><a href="">Status</a></li>
            </ul>
          </div>
          <div class="col-xs-3 col-md-3">
            <h6>Stay up to date</h6>
            <ul class="footer-links">  
                <form class="search-container">
                    <input type="text" id="search-bar" placeholder="What can I help you with today?">
                    <a href="#"><img class="search-icon" src="http://www.endlessicons.com/wp-content/uploads/2012/12/search-icon.png"></a>
                </form>   
            </ul>
          </div>
        </div>
        <hr>
      </div>
      <div class="container">
        <div class="row">
          <div class="col-md-8 col-sm-6 col-xs-12">
            <p class="copyright-text">Copyright &copy; 2024 All Rights Reserved by Sagitetit Boys.
            </p>
          </div>

        </div>
      </div>
</footer>
</template>
<script>
export default {
  name: 'Footer',

};
</script>
<style scoped>
@import './Footer.css';


.d-flex {
  display: flex;
}

.ms-auto {
  margin-left: auto;
}
</style>