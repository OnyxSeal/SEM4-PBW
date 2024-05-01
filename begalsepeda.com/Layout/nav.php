<head>
</head>
<style>
    @import url('https://fonts.googleapis.com/css2?family=Poppins:wght@200;300;400;500;600;700&display=swap');
    *{
      margin: 0;
      padding: 0;
      box-sizing: border-box;
      font-family: 'Poppins', sans-serif;
    }
    nav{
      position: fixed;
      top: 0;
      z-index: 99;
      width: 100%;
      background: #263545;
    }
    nav .wrapperR{
      position: relative;
      max-width: 1300px;
      padding: 0px 30px;
      height: 55px;
      line-height: 70px;
      margin: auto;
      display: flex;
      align-items: center;
      justify-content: space-between;
    }
    .wrapperR .logosR a{
      color: #f2f2f2;
      font-size: 30px;
      font-weight: 600;
      text-decoration: none;
    }
    .wrapperR .nav-linksR{
      display: inline-flex;
    }
    .nav-linksR li{
      list-style: none;
    }
    .nav-linksR li a{
      color: #f2f2f2;
      text-decoration: none;
      font-size: 18px;
      font-weight: 500;
      padding: 9px 15px;
      border-radius: 5px;
      transition: all 0.3s ease;
    }
    .nav-linksR .drop-menuR{
      position: absolute;
      background: #242526;
      width: 180px;
      line-height: 45px;
      top: 85px;
      opacity: 0;
      visibility: hidden;
      box-shadow: 0 6px 10px rgba(0,0,0,0.15);
    }
    .nav-linksR li:hover .drop-menuR{
      transition: all 0.3s ease;
      top: 70px;
      opacity: 1;
      visibility: visible;
    }
    .drop-menuR li a{
      width: 100%;
      display: block;
      padding: 0 0 0 15px;
      font-weight: 400;
      border-radius: 0px;
    }
    .wrapperR .btnR{
      color: #fff;
      font-size: 20px;
      cursor: pointer;
      display: none;
    }
    .wrapperR .btnR.close-btnR{
      position: absolute;
      right: 30px;
      top: 10px;
    }

    @media screen and (max-width: 970px) {
      .wrapperR .btnR{
        display: block;
      }
      .wrapperR .nav-linksR{
        position: fixed;
        height: 100vh;
        width: 100%;
        max-width: 350px;
        top: 0;
        left: -100%;
        background: #242526;
        display: block;
        padding: 50px 10px;
        line-height: 50px;
        overflow-y: auto;
        box-shadow: 0px 15px 15px rgba(0,0,0,0.18);
        transition: all 0.3s ease;
      }
      #menu-btn:checked ~ .nav-linksR{
        left: 0%;
      }
      #menu-btn:checked ~ .btnR.menu-btnR{
        display: none;
      }
      #close-btn:checked ~ .btnR.menu-btnR{
        display: block;
      }
      .nav-linksR li{
        margin: 15px 10px;
      }
      .nav-linksR li a{
        padding: 0 20px;
        display: block;
        font-size: 20px;
      }
      .nav-linksR .drop-menuR{
        position: static;
        opacity: 1;
        top: 65px;
        visibility: visible;
        padding-left: 20px;
        width: 100%;
        max-height: 0px;
        overflow: hidden;
        box-shadow: none;
        transition: all 0.3s ease;
      }
      .nav-linksR .mobile-itemR{
        display: block;
        color: #f2f2f2;
        font-size: 20px;
        font-weight: 500;
        padding-left: 20px;
        cursor: pointer;
        border-radius: 5px;
        transition: all 0.3s ease;
      }
      .nav-linksR .mobile-itemR:hover{
        background: #3A3B3C;
      }
      .drop-menuR li{
        margin: 0;
      }
      .drop-menuR li a{
        border-radius: 5px;
        font-size: 18px;
      }
    }
    nav input{
      display: none;
    }

    .logoBR{
        filter: invert(100%);
        width: 40px;
        height: 40px;
        margin: 0;
        padding: 0;
        transform: translateY(10px) !important;
    }

    .underlineR {
      position: relative;
      color: #ecf0f1;
      text-decoration: none;
      transition: 0.5s;

      &::after {
        position: absolute;
        content: "";
        top: 100%;
        left: 0;
        width: 100%;
        height: 2px;
        background: #e91e63;
        transform: scaleX(0);
        transform-origin: center;
        transition: transform 0.3s;
        margin-top: 0px;
        }

        &:hover {
          color: #95a5a6;
        }

        &:hover::after {
          transform: scaleX(1);
          transform-origin: center;
        }
      }
</style>

<nav>
  <div class="wrapperR">
    <div class="logosR"><a href="index.php"><img class="logoBR" src="https://www.svgrepo.com/show/352645/user-secret.svg" alt=""> Begal Sepeda </a></div>
    <input type="radio" name="slider" id="menu-btn">
    <input type="radio" name="slider" id="close-btn">
    <ul class="nav-linksR">
      <label for="close-btn" class="btnR close-btnR"><i class="fas fa-times"></i></label>
      <li>
        <a class="underlineR" href="index.php">Home</a>
      </li>
      <li>
        <a class="underlineR" href="mahasiswa.php">Mahasiswa</a>
      </li>
      <li>
        <a class="underlineR" href="matakuliah.php" class="desktop-itemR">Mata Kuliah</a>
      </li>
      <li>
        <a class="underlineR" href="krs.php" class="desktop-itemR">KRS</a>
      </li>
    </ul>
    <label for="menu-btn" class="btnR menu-btnR"><i class="fas fa-bars"></i></label>
  </div>
    </nav>