window.livewire.on('statusChangedServiceEvent', (message) => {
    toastNotification('success',message);
});

window.livewire.on('statusChangedUserEvent', (message) => {
    toastNotification('success',message);
});