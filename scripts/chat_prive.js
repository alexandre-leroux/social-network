

var users = document.getElementsByClassName("users");

console.log(users)
console.log(users.length)

for( var i = 0; i < users.length; i++ )
{
    console.log('dans for')

    users[i].addEventListener('click', function(e){

        console.log(e)
    
    })

}
