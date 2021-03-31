async function deleteUser(user_id){
    const userResponse = await questionNotification('¿Está seguro que quiere eliminar el usuario?', 'Esta acción eliminará por completo el registro y es irreversible.', 'Sí, estoy seguro');
    if(userResponse){
      axios.delete(`/users/${user_id}`)
      .then(response => {
        if (response.data.code == 200) {
          successNotification(response.data.message);
          Livewire.emit('UserDeletedEvent');
        } else {
          errorNotification(response.data.message);
        }                  
      })
      .catch((err)=>{
        errorNotification(`Algo salió mal, intente más tarde ${err}`);
      });
    }
  }