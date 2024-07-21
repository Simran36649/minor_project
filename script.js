const wrapper=document.querySelector('.wrapper');
const loginlink=document.querySelector('.login-link');
const registerlink=document.querySelector('.register-link');
const btnpopup=document.querySelector('.btnlogin-popup');
const iconclose=document.querySelector('.icon-close');

registerlink.addEventListener('click',()=>
{
    wrapper.classList.add('active');
});

loginlink.addEventListener('click',()=>
{
    wrapper.classList.remove('active');
});

btnpopup.addEventListener('click',()=>
{
  wrapper.classList.add('activepopup')
});



iconclose.addEventListener('click',()=>
{
  wrapper.classList.remove('activepopup')
});


const themeMap = {
  dark: "light",
  light: "solar",
  solar: "dark"
};

const theme = localStorage.getItem('theme')
  || (tmp = Object.keys(themeMap)[0],
      localStorage.setItem('theme', tmp),
      tmp);
const bodyClass = document.body.classList;
bodyClass.add(theme);

function toggleTheme() {
  const current = localStorage.getItem('theme');
  const next = themeMap[current];

  bodyClass.replace(current, next);
  localStorage.setItem('theme', next);
}

document.getElementById('themeButton').onclick = toggleTheme;


