async function deleteService(service_id){
    const userResponse = await questionNotification('¿Está seguro que quiere eliminar el servicio?', 'Esta acción eliminará por completo el registro y es irreversible.', 'Sí, estoy seguro');
    if(userResponse){
      axios.delete(`/services/${service_id}`)
      .then(response => {
        if (response.data.code == 200) {
          successNotification(response.data.message);
          Livewire.emit('ServiceDeletedEvent');
        } else {
          errorNotification(response.data.message);
        }                  
      })
      .catch((err)=>{
        errorNotification(`Algo salió mal, intente más tarde ${err}`);
      });
    }
  }