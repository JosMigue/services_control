window.livewire.on('statusChangedServiceEvent', (message) => {
    toastNotification('success',message);
});