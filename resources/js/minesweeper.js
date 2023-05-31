// noinspection JSUnresolvedReference

/** @type {GameCenter} gamecenter */
let gamecenter

/** @namespace humhub */
humhub.module('minesweeper', (module, req, $) => {
  // https://editor.p5js.org/codingtrain/sketches/Xap-KQuO_
  const event = req('event')
  const uiStatus = req('ui.status')

  gamecenter = req('gamecenter').shared(module.id)

  /** @returns {void} */
  function init() {
    gamecenter.startGame()
              .catch(error => uiStatus.error(error.message))
  }

  module.export({ init })

})

function make2DArray(cols, rows) {
  const arr = new Array(cols)
  for (let i = 0; i < arr.length; i++) {
    arr[i] = new Array(rows)
  }
  return arr
}

let grid
let cols
let rows
let w = 20
let time

let totalBees = 50

function setup() {
  const canvas = createCanvas(401, 401)
  canvas.parent('minesweeper')
  
  cols = floor(width / w)
  rows = floor(height / w)
  grid = make2DArray(cols, rows)
  for (let i = 0; i < cols; i++) {
    for (let j = 0; j < rows; j++) {
      grid[i][j] = new Cell(i, j, w)
    }
  }

  // Pick totalBees spots
  let options = []
  for (let i = 0; i < cols; i++) {
    for (let j = 0; j < rows; j++) {
      options.push([i, j])
    }
  }

  for (let n = 0; n < totalBees; n++) {
    let index = floor(random(options.length))
    let choice = options[index]
    let i = choice[0]
    let j = choice[1]
    // Deletes that spot so it's no longer an option
    options.splice(index, 1)
    grid[i][j].bee = true
  }

  for (var i = 0; i < cols; i++) {
    for (var j = 0; j < rows; j++) {
      grid[i][j].countBees()
    }
  }
}

function gameOver() {
  for (let i = 0; i < cols; i++) {
    for (let j = 0; j < rows; j++) {
      grid[i][j].revealed = true
    }
  }
  gamecenter.endGame()
}

function mousePressed() {
  for (let i = 0; i < cols; i++) {
    for (let j = 0; j < rows; j++) {
      if (grid[i][j].contains(mouseX, mouseY)) {
        grid[i][j].reveal()

        if (grid[i][j].bee) {
          gameOver()
        }
      }
    }
  }
}

function draw() {
  background(255)
  for (let i = 0; i < cols; i++) {
    for (let j = 0; j < rows; j++) {
      grid[i][j].show()
    }
  }
}


class Cell {
  constructor(i, j, w) {
    this.i = i
    this.j = j
    this.x = i * w
    this.y = j * w
    this.w = w
    this.neighborCount = 0

    this.bee = false
    this.revealed = false
  }

  show() {
    stroke(0)
    noFill()
    rect(this.x, this.y, this.w, this.w)
    if (this.revealed) {
      if (this.bee) {
        fill(127)
        ellipse(this.x + this.w * 0.5, this.y + this.w * 0.5, this.w * 0.5)
      }
      else {
        fill(200)
        rect(this.x, this.y, this.w, this.w)
        if (this.neighborCount > 0) {
          textAlign(CENTER)
          fill(0)
          text(this.neighborCount, this.x + this.w * 0.5, this.y + this.w - 6)
        }
      }
    }
  }

  countBees() {
    if (this.bee) {
      this.neighborCount = -1
      return
    }
    let total = 0
    for (let xoff = -1; xoff <= 1; xoff++) {
      let i = this.i + xoff
      if (i < 0 || i >= cols) continue

      for (let yoff = -1; yoff <= 1; yoff++) {
        let j = this.j + yoff
        if (j < 0 || j >= rows) continue

        let neighbor = grid[i][j]
        if (neighbor.bee) {
          total++
        }
      }
    }
    this.neighborCount = total
  }

  contains(x, y) {
    return (
      x > this.x && x < this.x + this.w && y > this.y && y < this.y + this.w
    )
  }

  reveal() {
    this.revealed = true
    if (this.neighborCount === 0) {
      // flood fill time
      this.floodFill()
    }
  }

  floodFill() {
    for (let xoff = -1; xoff <= 1; xoff++) {
      let i = this.i + xoff
      if (i < 0 || i >= cols) continue

      for (let yoff = -1; yoff <= 1; yoff++) {
        let j = this.j + yoff
        if (j < 0 || j >= rows) continue

        let neighbor = grid[i][j]
        // Note the neighbor.bee check was not required.
        // See issue #184
        if (!neighbor.revealed) {
          neighbor.reveal()
        }
      }
    }
  }
}
