var Node = function(data) {
    this.data = data;
    this.next = null;
    this.prev = null;
};

var LinkedList = function() {
    this.head = null;
    this.length = 0;
};

LinkedList.prototype.push = function(data) {
    this.length++;
    var node = new Node(data);
    if (!this.head) {
        this.head = node;
    } else {
        var end = this.last();
        end.next = node;
        node.prev = end;
    }
};

LinkedList.prototype.pop = function() {
    if (this.length == 0) {
        return null;
    }
    this.length--;
    var cur = this.head;
    while (cur.next) { cur = cur.next; }
    if (cur.prev) {
        cur.prev.next= null;
    } else {
        this.head = null;
    }
    return cur.data;
};

LinkedList.prototype.unshift = function(data) {
    this.length++;
    var node = new Node(data);
    if (this.head) {
        this.head.prev = node;
    }
    node.next = this.head;
    this.head = node;
};

LinkedList.prototype.shift = function() {
    if (this.length == 0) {
        return null;
    }
    this.length--;
    var oldHead = this.head;
    var newHead = oldHead.next;
    if (newHead) {
        newHead.prev = null;
    }
    this.head = newHead;
    return oldHead.data
};

LinkedList.prototype.count = function() {
    return this.length;
};

LinkedList.prototype.delete = function(value) {
    var cur = this.head;
    while (cur != null && cur.data != value) {
        cur = cur.next;
    }
    if (cur == null) {
        return null;
    }
    this.length--;
    var prev = cur.prev;
    var next = cur.next;
    if (prev) {
        prev.next = next;
    } else {
        // deleted first node in list
        this.head = next;
    }
    if (next) {
        next.prev = prev;
    }
};

LinkedList.prototype.last = function() {
    if (!this.head) {
        return null;
    }
    var cur = this.head;
    while (cur.next) {
        cur = cur.next;
    }
    return cur;
};

module.exports = LinkedList;
