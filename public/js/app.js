Vue.component('modal', {
	template: `
			<div class="modal is-active">
				<div class="modal-background"></div>
				<div class="modal-card">
					<header class="modal-card-head">
						<p class="modal-card-title"><slot name='modal_title'></slot></p>
						<button class="delete" aria-label="close" @click="$emit('close')"></button>
					</header>
					<section class="modal-card-body">
						<slot name='modal_content'></slot>
					</section>
					<footer class="modal-card-foot">
						<slot name='modal_button'></slot>
						<button class="button" @click="$emit('close')">Cancel</button>
					</footer>
				</div>
			</div>`,

});


new Vue({
	el: '#finance',
	data: {
		showModal: 0,
	}
});//vue instance for finance page


if(typeof members !== 'undefined'){//if isset(members)
	var member = members;
}else{
	member = {};
}

new Vue({
	el: '#users',
	data: {
		members: member,
		search: "",		
	},
	methods: {
		editUser: function(id){
			return "users/" + id + "/edit";
		}
	},

	computed: {
		memberSearch() {
			var result = [];
			if(!this.search){
				return this.members;
			}else{
				for (const key of Object.keys(this.members)) {
				    if(this.members[key].name.toLowerCase().includes(this.search)){
				    	//console.log(this.members[key]);
				    	result.push(this.members[key]);
				    }
				}
			}
			return result;
		}
	}
});//vue instance for members page