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

/*Variables from PHP*/
if(typeof members !== 'undefined'){//if isset(members)
	var member = members;
}else{
	member = {};
}

if(typeof breakdownusers !== 'undefined'){//if isset(members)
	var breakdownuser = breakdownusers;
}else{
	breakdownuser = {};
}

if(typeof records !== 'undefined'){//if isset(members)
	var records = records;
}else{
	records = {};
}

/*Vue instances*/

new Vue({
	el: '#users',
	data: {
		members: member,
		search: "",
		showModal: 0,
		memberdelete: "",
		memberdeleteid: "",
		memberid: 0,
		breakDownActionLink: "",
		records: records,
		breakdownusers: breakdownuser,
		note: "",
		total: "",
		thousands: "",
		five_hundreds: "",
		two_hundreds: "",
		hundreds: "",
		fifties: "",
		twenties: "",
		tens: "",
		fives: "",
		ones: "",
	},
	methods: {
		editUser: function(id){
			return "users/" + id + "/edit";
		},
		deleteFunction: function(member){
			this.showModal = 1;
			this.memberdelete = member.name;
			if(member.id == 1){
				this.memberdeleteid = "/users";
			}else{
				this.memberdeleteid = "users/" + member.id + "/delete";
			}
		},
		addPledgor: function(member){
			this.showModal = 2;
			this.memberdelete = member.name;
			this.memberid = member.id;
		},
		breakDown: function(member){
			this.memberdelete = member.name;
			this.memberid = member.id;
			this.breakDownActionLink = "breakdown/" + member.id;
			this.showModal = 2;
			for (const key of Object.keys(this.breakdownusers)) {
				if(member.id == this.breakdownusers[key].user_id){
					this.note = this.breakdownusers[key].note;
					this.total = this.breakdownusers[key].total;
					this.thousands = this.breakdownusers[key].thousands;
					this.five_hundreds = this.breakdownusers[key].five_hundreds;
					this.two_hundreds = this.breakdownusers[key].two_hundreds;
					this.hundreds = this.breakdownusers[key].hundreds;
					this.fifties = this.breakdownusers[key].fifties;
					this.twenties = this.breakdownusers[key].twenties;
					this.tens = this.breakdownusers[key].tens;
					this.fives = this.breakdownusers[key].fives;
					this.ones = this.breakdownusers[key].ones;
				}else{
					this.note = "";
					this.total = "";
					this.thousands = "";
					this.five_hundreds = "";
					this.two_hundreds = "";
					this.hundreds = "";
					this.fifties = "";
					this.twenties = "";
					this.tens = "";
					this.fives = "";
					this.ones = "";
				}
			}
		},
		ifTotal(id) {
			var returnme = 0;
			for (const key of Object.keys(this.breakdownusers)) {
				if(id == this.breakdownusers[key].user_id){
					returnme = 	this.breakdownusers[key].total;
				}
			}
			return returnme;
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
});//vue instance for members & finance page

new Vue({
	el: '#reports',
	data: {
		records: records,
	},
	methods: {
		momentFormat(record_date, update) {
			var returnme = "";
			date = moment(record_date, "YYYY-MM-DD").format('MMMM DD, YYYY');
			datetime = moment(record_date, "YYYY-MM-DD").format('dddd') + " " + moment(update).format("HH:mm");
			returnme = "<span>" + datetime + "</span>" + "</br>" +"<span>" + date + "</span>";
			return returnme;
		},
		hrefId: function(id){
			return "record/" + id;
		}
	},
	computed: {
	}
});//vue instance for reports

$( document ).ready(function() {    

});