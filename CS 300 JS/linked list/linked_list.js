// class for creating a node​
​function Node(value) {
	this.value = value;
	this.parent = undefined;
	this.child = undefined;
}
​
​
​function Doubly_linked_node(first_value) {
​
	var self = this;
​
	
	var getNode = function(index) {
		var node = self.head;
​
		for(var i=1; i<index; i++) {
			node = node.child;
		}
​
		return node;
	};
​
	
	this.head = new Node(first_value);
​
	
	this.tail = undefined;
​

	this.addNode = function(value) {
		var node = new Node(value);
​
		
		if(this.tail !== undefined)
		{
			
			this.tail.child = node;
			
		
			node.parent = this.tail;
		}
		
		else​
		{
			
			this.head.child = node;
​
			
			node.parent = this.head;
		}
​
		
		this.tail = node;
	}
​
	
	this.removeNode = function(index) {
	
		var current_node = this.tail;
​
	
		var delete_node = getNode(index);
​
	
		while(current_node.parent !== undefined) {
​
	
			if(current_node === delete_node)
			{
	
				current_node.parent.child = current_node.child;
				current_node.child.parent = current_node.parent;
			}
​
	
			current_node = current_node.parent;
		}
​
	
		this.head = current_node;
	}
​
	
	this.insertNode = function(value, index) {
	
		var current_node = this.tail;
​
	
		var node_position = getNode(index);
​
	
		var new_node = new Node(value);
​
	
		while(current_node.parent !== undefined) {
	
			if(current_node === node_position)
			{
	
				new_node.child = current_node;
				new_node.parent = current_node.parent;
​
	
				current_node.parent.child = new_node;
				current_node.parent = new_node;
			}
​
	
			current_node = current_node.parent;
		}
​
	
		this.head = current_node;
	}
​
	this.displayContents = function(type) {
	
		var current_node = this.head;
​
	
		if(type == 'backwards') 
			current_node = this.tail;
		
	
		while(current_node !== undefined) {
	
			console.log('value', current_node.value);
			console.log('parent', current_node.parent);
			console.log('child', current_node.child);
			console.log('\n---\n');
​
	
			if(type == 'backwards')
				current_node = current_node.parent;
			else​
				current_node = current_node.child;
		}
	}
​
	
	this.deleteDuplicate = function() {
	
		var current_node = this.tail;
​
	
	
		var current_node2 = current_node;
​
	
		var current_value = current_node.value;
 
	
	
		while(current_node.parent !== undefined) {
​
	
	
			while(current_node2.parent !== undefined) {
​
	
				current_node2 = current_node2.parent;
​
	
				if(current_node2.value == current_value)
				{
	
					current_node2.parent.child = current_node2.child;
					current_node2.child.parent = current_node2.parent;
				}
			} 
​
		
			current_node = current_node2 = current_node.parent;
			current_value = current_node.value;
		} 
​
	
		this.head = current_node;
	}
​
	this.getMiddleNode = function() {
	
		var current_node = this.head;
​
	
		var nodes = [];
​
	
		while(current_node !== undefined) {
​
	
			nodes.push(current_node);
​
	
			current_node = current_node.child;
		}
​
	
		var middle_index = Math.floor(nodes.length / 2);
​
	
		if(nodes.length % 2 != 0)
			console.log('The middle node has a value of ' + nodes[middle_index].value); // log the middle value in the nodes array​
		else​
			console.log('There is no middle node.'); 
	}
​
	
	this.mergeList = function(linked_list) {
	
		this.tail.child = linked_list.head;
​
	
		return this.head;
	}
}
​
​var manager = new Doubly_linked_node(5); 
manager.addNode(3);
manager.addNode(18);
manager.addNode(20);
manager.addNode(10);
​
manager.displayContents();
manager.getMiddleNode();