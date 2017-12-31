class Node {
  constructor(val) {
    this.data = val;
    this.next = null;
    this.prev = null;
  }
}

class LinkedList {
  constructor() {
    this.head = null;
    this.length = 0;
  }

  count() {
    return this.length;
  }

  push(data) {
    this.length += 1;
    const node = new Node(data);
    if (!this.head) {
      this.head = node;
    } else {
      let end = this.head;
      while (end.next) { end = end.next; }
      end.next = node;
      node.prev = end;
    }
  }

  pop() {
    if (this.length === 0) {
      return null;
    }
    this.length -= 1;
    let cur = this.head;
    while (cur.next) { cur = cur.next; }
    if (cur.prev) {
      cur.prev.next = null;
    } else {
      this.head = null;
    }
    return cur.data;
  }

  unshift(data) {
    this.length += 1;
    const node = new Node(data);
    if (this.head) {
      this.head.prev = node;
    }
    node.next = this.head;
    this.head = node;
  }

  shift() {
    if (this.length === 0) {
      return null;
    }
    this.length -= 1;
    const oldHead = this.head;
    const newHead = oldHead.next;
    if (newHead) {
      newHead.prev = null;
    }
    this.head = newHead;
    return oldHead.data;
  }

  delete(value) {
    let cur = this.head;
    while (cur !== null && cur.data !== value) {
      cur = cur.next;
    }
    if (cur === null) {
      return;
    }
    this.length -= 1;
    const prev = cur.prev;
    const next = cur.next;
    if (prev) {
      prev.next = next;
    } else {
      // deleted first node in list
      this.head = next;
    }
    if (next) {
      next.prev = prev;
    }
  }
}

export default LinkedList;
