<nav class="navbar navbar-expand-md navbar-dark fixed-top">
      <div class="container-fluid">
        <a class="navbar-brand d-flex" href="index.html">
          <h1>duQue<span>nch</span></h1>
          <i class="bi bi-cup-hot"></i>
        </a>
        <button
          class="navbar-toggler"
          type="button"
          data-bs-toggle="collapse"
          data-bs-target="#navbarNav"
        >
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
          <form
            class="form-inline navbar-nav ms-auto"
            action="search.php"
            method="post"
          >
            <div class="form-group">
              <input
                type="text"
                class="form-control"
                placeholder="Search Term"
                id="search-term"
                name="search-term"
              />
            </div>
            <div class="form-group mx-sm-2">
              <input
                type="text"
                class="form-control"
                placeholder="Search Location"
                id="search-location"
                name="search-location"
              />
            </div>
            <input
              type="hidden"
              id="page-name"
              name="page-name"
              value="search_page.html"
            />
            <button type="submit" class="btn btn-secondary">
              <i class="bi bi-search"></i>
            </button>
          </form>
        </div>
      </div>
    </nav>

<style>
.navbar {
  position: fixed;
  top: 0;
  width: 100%;
  z-index: 1000;
  background-color: rgba(28, 16, 10, 0.9);
}
.navbar-brand h1 {
  font-family: "Playfair Display", serif;
  color: #954c2a;
  font-size: 25px;
  text-shadow: 2px 2px 5px #00000065;
}
.navbar-brand span {
  font-size: 18px;
  color: #ffffff;
}
.form-inline button {
  background-color: rgba(45, 25, 16, 0.8);
  border-color: #ffffff;
}
.form-inline button:hover {
  background-color: #3d2418;
  border-color: #ffffff;
}

.form-inline input {
  background-color: rgba(45, 25, 16, 0.8);
  border-color: #ffffff;
  border-radius: 50px;
}
.form-inline input::placeholder {
  color: white;
}
.form-inline input:not(:focus) {
  color: white;
}
.form-inline input:focus {
  background-color: #3d2418;
  border-color: #ffffff;
  color: white;
  box-shadow: 0 5px 5px 3px rgba(0, 0, 0, 0.3);
}

</style>