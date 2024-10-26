<style>

*{
    margin: 0px;
    padding: 0px;
    box-sizing: border-box;
}
.theme-switch {
    --toggle-size: 30px;
    --container-width: 70px;
    --container-height:30px;
    --container-radius:50px ;
    --container-light-bg: #3D7EAE;
    --container-night-bg: #1D1F2C;
    --circle-container-diameter: 3.375em;
    --sun-moon-diameter: 30px;
    --sun-bg: #ECCA2F;
    --moon-bg: #C4C9D1;
    --spot-color: #959DB1;
    --circle-container-offset: calc((var(--circle-container-diameter) - var(--container-height)) / 2 * -1);
    --stars-color: #fff;
    --clouds-color: #F3FDFF;
    --back-clouds-color: #AACADF;
    --transition: .5s cubic-bezier(0, -0.02, 0.4, 1.25);
    --circle-transition: .3s cubic-bezier(0, -0.02, 0.35, 1.17);
  }
  
  .theme-switch, .theme-switch *, .theme-switch *::before, .theme-switch *::after {
    -webkit-box-sizing: border-box;
    box-sizing: border-box;
    margin: 0;
    padding: 0;
    font-size: var(--toggle-size);
  }
  
  .theme-switch__container {
    width: var(--container-width);
    height: var(--container-height);
    background-color: var(--container-light-bg);
    border-radius: var(--container-radius);
    overflow: hidden;
    cursor: pointer;
    -webkit-box-shadow: 0em -0.062em 0.062em rgba(0, 0, 0, 0.25), 0em 0.062em 0.125em rgba(255, 255, 255, 0.94);
    box-shadow: 0em -0.062em 0.062em rgba(0, 0, 0, 0.25), 0em 0.062em 0.125em rgba(255, 255, 255, 0.94);
    -webkit-transition: var(--transition);
    -o-transition: var(--transition);
    transition: var(--transition);
    position: relative;
  }
  
  .theme-switch__container::before {
    content: "";
    position: absolute;
    z-index: 1;
    inset: 0;
    -webkit-box-shadow: 0em 0.05em 0.187em rgba(0, 0, 0, 0.25) inset, 0em 0.05em 0.187em rgba(0, 0, 0, 0.25) inset;
    box-shadow: 0em 0.05em 0.187em rgba(0, 0, 0, 0.25) inset, 0em 0.05em 0.187em rgba(0, 0, 0, 0.25) inset;
    border-radius: var(--container-radius)
  }
  
  .theme-switch__checkbox {
    display: none;
  }
  
  .theme-switch__circle-container {
    width: var(--circle-container-diameter);
    height: var(--circle-container-diameter);
    background-color: rgba(255, 255, 255, 0.1);
    position: absolute;
    left: var(--circle-container-offset);
    top: var(--circle-container-offset);
    border-radius: var(--container-radius);
    -webkit-box-shadow: inset 0 0 0 3.375em rgba(255, 255, 255, 0.1), inset 0 0 0 3.375em rgba(255, 255, 255, 0.1), 0 0 0 0.625em rgba(255, 255, 255, 0.1), 0 0 0 1.25em rgba(255, 255, 255, 0.1);
    box-shadow: inset 0 0 0 3.375em rgba(255, 255, 255, 0.1), inset 0 0 0 3.375em rgba(255, 255, 255, 0.1), 0 0 0 0.625em rgba(255, 255, 255, 0.1), 0 0 0 1.25em rgba(255, 255, 255, 0.1);
    display: -webkit-box;
    display: -ms-flexbox;
    display: flex;
    -webkit-transition: var(--circle-transition);
    -o-transition: var(--circle-transition);
    transition: var(--circle-transition);
    pointer-events: none;
  }
  
  .theme-switch__sun-moon-container {
    pointer-events: auto;
    position: relative;
    z-index: 2;
    width: var(--sun-moon-diameter);
    height: var(--sun-moon-diameter);
    margin: auto;
    border-radius: var(--container-radius);
    background-color: var(--sun-bg);
    -webkit-box-shadow: 0.062em 0.062em 0.062em 0em rgba(254, 255, 239, 0.61) inset, 0em -0.062em 0.062em 0em #a1872a inset;
    box-shadow: 0.062em 0.062em 0.062em 0em rgba(254, 255, 239, 0.61) inset, 0em -0.062em 0.062em 0em #a1872a inset;
    -webkit-filter: drop-shadow(0.062em 0.125em 0.125em rgba(0, 0, 0, 0.25)) drop-shadow(0em 0.062em 0.125em rgba(0, 0, 0, 0.25));
    filter: drop-shadow(0.062em 0.125em 0.125em rgba(0, 0, 0, 0.25)) drop-shadow(0em 0.062em 0.125em rgba(0, 0, 0, 0.25));
    overflow: hidden;
    -webkit-transition: var(--transition);
    -o-transition: var(--transition);
    transition: var(--transition);
  }
  
  .theme-switch__moon {
    -webkit-transform: translateX(100%);
    -ms-transform: translateX(100%);
    transform: translateX(100%);
    width: 100%;
    height: 100%;
    background-color: var(--moon-bg);
    border-radius: inherit;
    -webkit-box-shadow: 0.062em 0.062em 0.062em 0em rgba(254, 255, 239, 0.61) inset, 0em -0.062em 0.062em 0em #969696 inset;
    box-shadow: 0.062em 0.062em 0.062em 0em rgba(254, 255, 239, 0.61) inset, 0em -0.062em 0.062em 0em #969696 inset;
    -webkit-transition: var(--transition);
    -o-transition: var(--transition);
    transition: var(--transition);
    position: relative;
  }
  
  .theme-switch__spot {
    position: absolute;
    top: 0.75em;
    left: 0.312em;
    width: 0.75em;
    height: 0.75em;
    border-radius: var(--container-radius);
    background-color: var(--spot-color);
    -webkit-box-shadow: 0em 0.0312em 0.062em rgba(0, 0, 0, 0.25) inset;
    box-shadow: 0em 0.0312em 0.062em rgba(0, 0, 0, 0.25) inset;
  }
  
  .theme-switch__spot:nth-of-type(2) {
    width: 0.375em;
    height: 0.375em;
    top: 0.937em;
    left: 1.375em;
  }
  
  .theme-switch__spot:nth-last-of-type(3) {
    width: 0.25em;
    height: 0.25em;
    top: 0.312em;
    left: 0.812em;
  }
  
  .theme-switch__clouds {
    width: 1.25em;
    height: 1.25em;
    background-color: var(--clouds-color);
    border-radius: var(--container-radius);
    position: absolute;
    bottom: -0.625em;
    left: 0.312em;
    -webkit-box-shadow: 0.937em 0.312em var(--clouds-color), -0.312em -0.312em var(--back-clouds-color), 1.437em 0.375em var(--clouds-color), 0.5em -0.125em var(--back-clouds-color), 2.187em 0 var(--clouds-color), 1.25em -0.062em var(--back-clouds-color), 2.937em 0.312em var(--clouds-color), 2em -0.312em var(--back-clouds-color), 3.625em -0.062em var(--clouds-color), 2.625em 0em var(--back-clouds-color), 4.5em -0.312em var(--clouds-color), 3.375em -0.437em var(--back-clouds-color), 4.625em -1.75em 0 0.437em var(--clouds-color), 4em -0.625em var(--back-clouds-color), 4.125em -2.125em 0 0.437em var(--back-clouds-color);
    box-shadow: 0.937em 0.312em var(--clouds-color), -0.312em -0.312em var(--back-clouds-color), 1.437em 0.375em var(--clouds-color), 0.5em -0.125em var(--back-clouds-color), 2.187em 0 var(--clouds-color), 1.25em -0.062em var(--back-clouds-color), 2.937em 0.312em var(--clouds-color), 2em -0.312em var(--back-clouds-color), 3.625em -0.062em var(--clouds-color), 2.625em 0em var(--back-clouds-color), 4.5em -0.312em var(--clouds-color), 3.375em -0.437em var(--back-clouds-color), 4.625em -1.75em 0 0.437em var(--clouds-color), 4em -0.625em var(--back-clouds-color), 4.125em -2.125em 0 0.437em var(--back-clouds-color);
    -webkit-transition: 0.5s cubic-bezier(0, -0.02, 0.4, 1.25);
    -o-transition: 0.5s cubic-bezier(0, -0.02, 0.4, 1.25);
    transition: 0.5s cubic-bezier(0, -0.02, 0.4, 1.25);
  }
  
  .theme-switch__stars-container {
    position: absolute;
    color: var(--stars-color);
    top: -100%;
    left: 0.312em;
    width: 2.75em;
    height: auto;
    -webkit-transition: var(--transition);
    -o-transition: var(--transition);
    transition: var(--transition);
  }
  
  /* actions */
  
  .theme-switch__checkbox:checked + .theme-switch__container {
    background-color: var(--container-night-bg);
  }
  
  .theme-switch__checkbox:checked + .theme-switch__container .theme-switch__circle-container {
    left: calc(100% - var(--circle-container-offset) - var(--circle-container-diameter));
  }
  
  .theme-switch__checkbox:checked + .theme-switch__container .theme-switch__circle-container:hover {
    left: calc(100% - var(--circle-container-offset) - var(--circle-container-diameter) - 0.187em)
  }
  
  .theme-switch__circle-container:hover {
    left: calc(var(--circle-container-offset) + 0.187em);
  }
  
  .theme-switch__checkbox:checked + .theme-switch__container .theme-switch__moon {
    -webkit-transform: translate(0);
    -ms-transform: translate(0);
    transform: translate(0);
  }
  
  .theme-switch__checkbox:checked + .theme-switch__container .theme-switch__clouds {
    bottom: -4.062em;
  }
  
  .theme-switch__checkbox:checked + .theme-switch__container .theme-switch__stars-container {
    top: 50%;
    -webkit-transform: translateY(-50%);
    -ms-transform: translateY(-50%);
    transform: translateY(-50%);
  }

  :root {
    --black: black;
    --white: rgb(255, 238, 238);
    --bg-color: #212529 ;  
    --text-color: white ;
  }
  
  body {
    background-color: var(--bg-color);
    color: var(--text-color);
  }
  
  .dask {
    color: var(--text-color);
  }
 
  /*================add button add students page================================*/
 
  .buttonadd {
    position: relative;
    transition: all 0.3s ease-in-out;
    box-shadow: 0px 10px 20px rgba(0, 0, 0, 0.2);
    padding-block: 0.5rem;
    padding-inline: 1.25rem;
    background-color: rgb(179, 0, 0);
    border-radius: 9999px;
    display: flex;
    align-items: center;
    justify-content: center;
    cursor: pointer;
    color: #ffff;
    gap: 10px;
    font-weight: bold;
    border: 3px solid #ffffff4d;
    outline: none;
    overflow: hidden;
    font-size: 15px;
  }
  
  .icon {
    width: 24px;
    height: 24px;
    transition: all 0.3s ease-in-out;
  }
  
  .buttonadd:hover {
    transform: scale(1.05);
    border-color: #fff9;
  }
  
  .buttonadd:hover .icon {
    transform: translate(4px);
  }
  
  .buttonadd:hover::before {
    animation: shine 1.5s ease-out infinite;
  }
  
  .buttonadd::before {
    content: "";
    position: absolute;
    width: 100px;
    height: 100%;
    background-image: linear-gradient(
      120deg,
      rgba(255, 255, 255, 0) 30%,
      rgba(255, 255, 255, 0.8),
      rgba(255, 255, 255, 0) 70%
    );
    top: 0;
    left: -100px;
    opacity: 0.6;
  }
  
  @keyframes shine {
    0% {
      left: -100px;
    }
  
    60% {
      left: 100%;
    }
  
    to {
      left: 100%;
    }
    
  }
  
  fieldset {
    border: 1px solid #ddd; 
    padding: 10px;
    margin-bottom: 20px; 
}

/*====================save button============================*/

.bookmarkBtn {
  width: 100px;
  height: 40px;
  border-radius: 40px;
  border: 1px solid rgba(255, 255, 255, 0.349);
  background-color: rgb(12, 12, 12);
  display: flex;
  align-items: center;
  justify-content: center;
  cursor: pointer;
  transition-duration: 0.3s;
  overflow: hidden;
}

.IconContainer {
  width: 30px;
  height: 30px;
  background: linear-gradient(to bottom, rgb(255, 136, 255), rgb(172, 70, 255));
  border-radius: 50px;
  display: flex;
  align-items: center;
  justify-content: center;
  overflow: hidden;
  z-index: 2;
  transition-duration: 0.3s;
}

.icon {
  border-radius: 1px;
}

.text {
  height: 100%;
  width: 60px;
  display: flex;
  align-items: center;
  justify-content: center;
  color: white;
  z-index: 1;
  transition-duration: 0.3s;
  font-size: 1.04em;
}

.bookmarkBtn:hover .IconContainer {
  width: 90px;
  transition-duration: 0.3s;
}

.bookmarkBtn:hover .text {
  transform: translate(10px);
  width: 0;
  font-size: 0;
  transition-duration: 0.3s;
}

.bookmarkBtn:active {
  transform: scale(0.95);
  transition-duration: 0.3s;
}

/* search button */
.tablecolor thead th,
    .tablecolor tbody td {
      background-color: rgba(255, 255, 255, 0.1) !important;
      color: var(--text-color);
    }

    .input__container {
      position: relative;
      background: rgba(255, 255, 255, 0.664);
      padding: 5px 10px;
      display: flex;
      justify-content: center;
      align-items: center;
      gap: 5px;
      border-radius: 22px;
      max-width: 300px;
      transition: transform 400ms;
      transform-style: preserve-3d;
      /* transform: rotateX(15deg) rotateY(-20deg); */
      /* perspective: 500px; */
    }

    .shadow__input {
      content: "";
      position: absolute;
      width: 100%;
      height: 100%;
      left: 0;
      bottom: 0;
      z-index: -1;
      filter: blur(30px);
      border-radius: 20px;
      background-color: #999cff;
      background-image: radial-gradient(at 85% 51%, hsla(60, 60%, 61%, 1) 0px, transparent 50%),
        radial-gradient(at 74% 68%, hsla(235, 69%, 77%, 1) 0px, transparent 50%),
        radial-gradient(at 64% 79%, hsla(284, 72%, 73%, 1) 0px, transparent 50%),
        radial-gradient(at 75% 16%, hsla(283, 60%, 72%, 1) 0px, transparent 50%),
        radial-gradient(at 90% 65%, hsla(153, 70%, 64%, 1) 0px, transparent 50%),
        radial-gradient(at 91% 83%, hsla(283, 74%, 69%, 1) 0px, transparent 50%),
        radial-gradient(at 72% 91%, hsla(213, 75%, 75%, 1) 0px, transparent 50%);
    }

    .input__button__shadow {
      cursor: pointer;
      border: none;
      background: none;
      transition: transform 400ms, background 400ms;
      display: flex;
      justify-content: center;
      align-items: center;
      border-radius: 12px;
      padding: 5px;
    }

    .input__button__shadow:hover {
      background: rgba(255, 255, 255, 0.411);
    }

    .input__search {
      width: 100%;
      border-radius: 20px;
      outline: none;
      border: none;
      padding: 8px;
      position: relative;
    }

    .btn-rounded {
      border-radius: 50% !important;
      padding: 10px 15px;
    }

    /* button */
    .btnprev {
      font-size: 1.2rem;
      border: none;
      outline: none;
      border-radius: 0.4rem;
      cursor: pointer;
      text-transform: uppercase;
      background-color: rgb(14, 14, 26);
      color: rgb(234, 234, 234);
      font-weight: 700;
      transition: 0.6s;
      box-shadow: 0px 0px 60px #1f4c65;
      -webkit-box-reflect: below 10px linear-gradient(to bottom, rgba(0, 0, 0, 0.0), rgba(0, 0, 0, 0.4));
    }

    .btnprev:active {
      scale: 0.92;
    }

    .btnprev:hover {
      background: rgb(2, 29, 78);
      background: linear-gradient(270deg, rgba(2, 29, 78, 0.681) 0%, rgba(31, 215, 232, 0.873) 60%);
      color: rgb(4, 4, 38);
    }

    /* edit button */
    .lock-button {
      width: 40px;
      height: 40px;
      border-radius: 50%;
      background-color: rgb(20, 20, 20);
      border: none;
      font-weight: 600;

      align-items: center;
      justify-content: center;
      box-shadow: 0px 0px 20px rgba(0, 0, 0, 0.164);
      cursor: pointer;
      transition-duration: 0.3s;
      overflow: hidden;
      position: relative;
      text-decoration: none !important;
    }

    .lock-svgIcon {
      width: 17px;
      transition-duration: 0.3s;
    }

    .lock-svgIcon path {
      fill: white;
    }

    .lock-button:hover {
      border-radius: 50px;
      transition-duration: 0.3s;
      background-color: rgb(255, 69, 69);
      align-items: center;
    }

    .lock-button:hover .lock-svgIcon {
      width: 20px;
      transition-duration: 0.3s;
      -webkit-transform: rotate(360deg);
    }

    .lock-button::before {
      display: none;
      color: white;
      transition-duration: 0.3s;
    }

    .lock-button:hover::before {
      display: block;
      opacity: 1;
      transform: translateY(0px);
      transition-duration: 0.3s;
    }

    table tr,th,td{
      border: 1px solid var(--text-color);
    }
  
</style>