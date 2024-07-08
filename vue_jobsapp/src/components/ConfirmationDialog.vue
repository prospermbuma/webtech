<script setup>
import { defineProps, defineEmits } from 'vue';

const props = defineProps({
    message: {
        type: String,
        default: 'Are you sure you want to delete this job?',
    },
    isVisible: {
        type: Boolean,
        default: false,
    },
});

const emit = defineEmits(['confirm', 'cancel']);

const confirm = () => {
    emit('confirm');
}

const cancel = () => {
    emit('cancel');
}
</script>

<template>
    <div v-if="isVisible" class="modal">
        <div class="modal-content">
            <p>{{ message }}</p>
            <div class="buttons">
                <button @click="confirm" id="confirm">Confirm</button>
                <button @click="cancel" id="cancel">Cancel</button>
            </div>
        </div>
    </div>
</template>

<style scoped>
.modal {
    display: flex;
    justify-content: center;
    align-items: center;
    position: fixed;
    top: 0;
    left: 0;
    width: 100%;
    height: 100%;
    background-color: rgba(0, 0, 0, 0.5);
}

@keyframes popUp {
    from {
        transform: scale(0.8);
    }
    to {
        transform: scale(1.0);
    }
}

.modal-content {
    background-color: white;
    padding: 30px;
    border-radius: 5px;
    text-align: center;
    animation: popUp 0.3s ease alternate;
}

.modal-content .buttons {
    margin-top: 12px;
    display: flex;
    justify-content: center;
    align-items: center;
    gap: 0.5em;
}

.modal-content button {
    border: none;
    outline: none;
    padding: 9px 12px;
    border-radius: 50px;
    transition: all 0.3s;
    color: white;
    width: 100%;
}

.modal-content button:hover {
    cursor: pointer;
}

.modal-content button#confirm {
    color: #16a34a;
    border: 1px solid #16a34a;
    background-color: transparent;
}

.modal-content button#confirm:hover {
    color: white;
    border: 1px solid #16a34a;
    background-color: #16a34a;
}

.modal-content button#cancel {
    border: 1px solid #ef4444;
    background-color: #ef4444;
}

.modal-content button#cancel:hover {
    border: 1px solid #dc2626;
    background-color: #dc2626;
}
</style>