const taskUpdate = (action, idTask) => {
  location.href = `index.php?inc=${action}&idTask=${idTask}`;
};

const taskUpdateStatus = (action, fkstatus, idTask) => {
  fkstatus = fkstatus == 1 ? 2 : 1;
  location.href = `index.php?action=updatestatus&idTask=${idTask}&idStatus=${fkstatus}`;
};
